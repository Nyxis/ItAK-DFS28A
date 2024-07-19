class Character: 
    def __init__(self, force, rapidite, intelligence, vitalite, classe, equipements=[]):
        self.force = force
        self.rapidite = rapidite
        self.intelligence = intelligence
        self.vitalite = vitalite
        self.classe = classe
        self.equipements = equipements

    def get_stats(self):
        stats = {
            'Force': self.force,
            'Rapidite': self.rapidite,
            'Intelligence': self.intelligence,
            'Vitalite': self.vitalite
        }
        for equip in self.equipements:
            for stat, value in equip.items():
                stats[stat] += value
        return stats
