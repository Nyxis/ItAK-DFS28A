import random

class Scenario:
    def __init__(self, rencontres):
        self.rencontres = rencontres

    def run_scenario(self, personnage, game_master):
        while personnage.get_vitalite() > 0 and self.rencontres:
            # Choisir une rencontre au hasard parmi celles qui n'ont pas encore été terminées
            rencontre = random.choice(self.rencontres)

            # Calculer les taux de chaque issue de la rencontre
            rates = rencontre.calculate_rates(personnage)

            # Envoyer les taux au GameMaster pour effectuer le tirage du résultat
            result = game_master.pleaseGiveMeACrit(rates)

            # Modifier le personnage en fonction de l'issue
            if result == 'Fumble':
                personnage.double_vitalite_loss()
            elif result == 'Echec':
                personnage.decrease_vitalite()
            elif result == 'Succes':
                personnage.increase_vitalite()
                self.rencontres.remove(rencontre)
            elif result == 'Critique':
                personnage.increase_vitalite()
                personnage.acquire_bonus_equipment(rencontre.get_bonus_equipment())
                self.rencontres.remove(rencontre)

        if personnage.get_vitalite() <= 0:
            print("Le personnage est vaincu. Le scénario se termine.")
        else:
            print("Toutes les rencontres ont été effectuées avec succès. Le scénario se termine.")

