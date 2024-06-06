from .Buffable import Buffable

class Stat(Buffable):
    def __init__(self, type, value):
        self.type = type
        self.value = value