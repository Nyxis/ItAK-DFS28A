class StatType:
    def __init__(self, name):
        self.name = name


# default types
force = StatType('Force')
rapidite = StatType('Rapidité')
intelligence = StatType('Intelligence')
vitalite = StatType('Vitalité')

fumble = StatType('Fumble')
critique = StatType('Critique')
succes = StatType('Succes')
echec = StatType('Echec')