class Scenario:
    def __init__(self, rencontres):
        self.rencontres = rencontres

    def lancer(self, personnage, game_master):
        # for stat in personnage.get_stats():
        #     print(stat.type.name)
        vitalite = [stat for stat in personnage.get_stats() if stat.type.name == 'Vitalité'].pop()
        while vitalite.value > 0 and self.rencontres:
            rencontre = self.rencontres.pop()
            rates = rencontre.calculate_rates(personnage)
            gm_result = game_master.pleaseGiveMeACrit()

            fail_rate = 100 - game_master.fumble_rate - game_master.crit_rate - game_master.success_rate

            if gm_result <= fail_rate:
                vitalite.value -= rencontre.perte_vitalite
            if gm_result > fail_rate and gm_result <= fail_rate + game_master.fumble_rate:
                vitalite.value -= rencontre.perte_vitalite * 2
            elif gm_result > fail_rate + game_master.fumble_rate and gm_result <= fail_rate + game_master.fumble_rate + game_master.crit_rate:
                vitalite.value += rencontre.perte_vitalite
                personnage.equipements.append(rencontre.equipement_bonus)
                personnage.modificateurs = personnage.calculate_modifiers()
            elif gm_result > fail_rate + game_master.fumble_rate + game_master.crit_rate and gm_result <= fail_rate + game_master.fumble_rate + game_master.crit_rate + game_master.success_rate:
                vitalite.value += rencontre.perte_vitalite

            print(f'Rencontre: {rencontre.description}, Résultat: {gm_result}')
            print(f'Vitalité restante: {vitalite.value}')

            if vitalite.value <= 0:
                print(f'{personnage.name} a été vaincu!')
                return 'Defaite'
        
        print(f'{personnage.name} a terminé toutes les rencontres!')
        return 'Victoire'