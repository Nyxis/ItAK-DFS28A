class Rencontre:
    def __init__(self, description, base_rates, modificateurs, perte_vitalite, equipement_bonus):
        self.description = description
        self.base_rates = base_rates
        self.modificateurs = modificateurs
        self.perte_vitalite = perte_vitalite
        self.equipement_bonus = equipement_bonus

    def calculate_rates(self, personnage):
        rates = self.base_rates.copy()
        stats = personnage.get_stats()

        for mod in self.modificateurs:
            stat = [stat for stat in stats if stat.type.name == mod.stat_type.name].pop()
            rate = [rate for rate in rates if rate.type.name == mod.taux.type.name].pop()
            rate_to_decrease = [rate for rate in rates if rate.type.name == mod.to_decrease.name].pop()
            if mod.getModifier(stat.value) :
                rate.value += mod.taux.value
                rate_to_decrease.value -= mod.taux.value
        
        return rates