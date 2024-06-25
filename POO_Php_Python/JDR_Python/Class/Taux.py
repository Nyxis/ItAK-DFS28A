from .Buffable import Buffable

class Taux(Buffable):
    def __init__(self, type_taux, increase):
        super().__init__(type_taux, increase)
        