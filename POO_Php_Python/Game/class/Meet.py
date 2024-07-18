class Rencontre:
    def __init__(self, base_crit, base_success, base_failure, base_fumble, vit_loss, crit_bonus):
        self.base_crit = base_crit
        self.base_success = base_success
        self.base_failure = base_failure
        self.base_fumble = base_fumble
        self.vit_loss = vit_loss
        self.crit_bonus = crit_bonus

    def get_rates(self, personnage):
        stats = personnage.get_stats()
        crit = self.base_crit + (5 if stats['Force'] >= 10 else 0)
        success = self.base_success
        failure = self.base_failure
        fumble = self.base_fumble + (5 if stats['Rapidite'] <= 5 else 0)
        return crit, success, failure, fumble