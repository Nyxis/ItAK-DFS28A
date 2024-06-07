from .Stat import Stat
from .StatType import StatType

class Personnage:
    def __init__(self, base_stats, classe, equipements, base_modificateurs):
        self.base_stats = base_stats
        self.classe = classe
        self.equipements = equipements
        self.modificateurs = self.calculate_modifiers(base_modificateurs)

    def calculate_modifiers(self, modificateurs):
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