from .Stat import Stat
from .StatType import StatType, force, rapidite, intelligence, vitalite

class Personnage:
    def __init__(self, name, base_stats, classe, equipements):
        self.name = name
        self.base_stats = base_stats
        self.classe = classe
        self.equipements = equipements
        self.modificateurs = self.calculate_modifiers()

    def calculate_modifiers(self):
        modificateurs = [
            Stat(force, 0),
            Stat(rapidite, 0),
            Stat(intelligence, 0),
            Stat(vitalite, 0),
        ]

        for stat in self.classe.stats:
            modificateur = [mod for mod in modificateurs if mod.type.name == stat.type.name].pop()
            modificateur.increaseStat(stat.value)

        for equipement in self.equipements:
            for stat in equipement.stats:
                modificateur = [mod for mod in modificateurs if mod.type.name == stat.type.name].pop()
                modificateur.increaseStat(stat.value)

        return modificateurs

    def get_stats(self):
        stats = []
        for stat in self.base_stats:
            modificateur = [mod for mod in self.modificateurs if mod.type.name == stat.type.name].pop()
            stats.append(
                Stat(StatType(stat.type.name), stat.value + modificateur.value)
            )

        return stats