class Buffable:
    def __init__(self, type_stat, value):
        self.type = type_stat
        self.value = value

    def increaseStat(self, buff):
        self.value += buff