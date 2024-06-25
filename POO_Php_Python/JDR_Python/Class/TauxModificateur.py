class TauxModificateur:
    def __init__(self, taux, to_decrease, stat_type, seuil, condition):
        self.taux = taux
        self.seuil = seuil
        self.stat_type = stat_type
        self.to_decrease = to_decrease
        self.condition = condition

    def getModifier(self, stat_value):
        cond = self.condition
        match cond:
            case 'lt':
                return stat_value < self.seuil
            case 'lte':
                return stat_value <= self.seuil
            case 'gt':
                return stat_value > self.seuil
            case 'gte':
                return stat_value >= self.seuil
            case 'eq':
                return stat_value == self.seuil
            case 'neq':
                return stat_value != self.seuil