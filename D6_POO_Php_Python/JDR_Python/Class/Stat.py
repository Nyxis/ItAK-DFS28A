from .Buffable import Buffable

class Stat(Buffable):
    def __init__(self, type_stat, value):
        super().__init__(type_stat, value)