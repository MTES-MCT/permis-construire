# Roles

Il y a un type de roles métier: 
    
 - Ville

Une utilisateur "Ville" est associé à une entité Ville, et une fois correctement configuré,
il peut télécharger les demandes associées à ses différents formulaires

Un autre type de compte, admin, permet d'avoir accès au backoffice de gestion de l'application

Voici comment créer quelques utilisateurs de test en ligne de commande:

    bin/console fos:user:create niort niort@gmail.com niort
    bin/console fos:user:promote niort ROLE_VILLE
    
    # Un compte administrateur peut également avoir accès au backoffice de gestion   
    bin/console fos:user:create admin admin@gmail.com admin
    bin/console fos:user:promote admin ROLE_ADMIN