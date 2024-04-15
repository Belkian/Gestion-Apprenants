# Gestion-Apprenants

inscription

Connexion d'un formateur 

Possibilitée d'ajouter d'une classe
Possibilitée d'ajouter un apprenant

Création de cours

SELECT  gestionapp_user.ID_USER, 
		gestionapp_user.ID_ROLE,
        gestionapp_user.NOM,
        gestionapp_user.PRENOM,
        gestionapp_user.EMAIL,
        gestionapp_role.NAME ,
        gestionapp_classe.ID_CLASS , 
        gestionapp_classe.NOM as NOM_CLASSE,
        gestionapp_classe.NOMBRE_APPRENANT,
        gestionapp_classe.DATE_DEBUT,
        gestionapp_classe.DATE_FIN
       FROM gestionapp_user,
       gestionapp_role ,
       gestionapp_classe
        WHERE gestionapp_user.EMAIL = 'simplon@gmail.com'
        AND gestionapp_user.ID_USER = gestionapp_role.ID_ROLE;