class Scenario:
    def __init__(self, rencontres):
        self.rencontres = rencontres

    def lancer(self, personnage, game_master):
        # vitalite = [stat for stat in personnage.get_stats() if stat.type.name == 'Vitalite'].pop()
        # while vitalite > 0 and self.rencontres:
        #     rencontre = self.rencontres.pop()
        #     rates = rencontre.calculate_rates(personnage)
        #     gm_result = game_master.pleaseGiveMeACrit()

        #     if gm_result == game_master.fumble_rate:
        #         vitalite -= rencontre.perte_vitalite * 2
        #     elif gm_result == game_master.fumble_rate + game_master.crit_rate:
        #         vitalite += rencontre.perte_vitalite
        #         personnage.equipements.append(rencontre.equipement_bonus)
        #         personnage.modificateurs = personnage.calculate_modifiers()
        #     elif gm_result == game_master.fumble_rate + game_master.crit_rate + game_master.success_rate:
        #         vitalite += rencontre.perte_vitalite
        #     else:
        #         vitalite -= rencontre.perte_vitalite

        #     print(f'Rencontre: {rencontre.description}, Résultat: {gm_result}')
        #     print(f'Vitalité restante: {vitalite}')

        #     if vitalite <= 0:
        #         print(f'{personnage.nom} a été vaincu!')
        #         return 'Defaite'
        
        # print(f'{personnage.nom} a terminé toutes les rencontres!')
        return 'Victoire'