# Roles

Il y a 3 types de roles: 
    
 - demandeur
    - il peut déposer un dossier
 - instructeur
    - il est associé à un ensemble de communes, pour lesquelles il peut:
      - consulter les dossiers
      - effectuer des retours (demander des précisions, demander un changement ou ajout de pièces jointes)
      - valider/refuser un dossier 
 - mairie
   - il peut consulter les dossiers associés à l'ensemble des communes

Voici comment créer quelques utilisateurs de test en ligne de commande:

    bin/console fos:user:create demandeur demandeur@gmail.com demandeur
    bin/console fos:user:create instructeur instructeur@gmail.com instructeur
    bin/console fos:user:create mairie mairie@gmail.com mairie
    bin/console fos:user:promote demandeur ROLE_DEMANDEUR
    bin/console fos:user:promote instructeur ROLE_INSTRUCTEUR
    bin/console fos:user:promote mairie ROLE_MAIRIE   
  