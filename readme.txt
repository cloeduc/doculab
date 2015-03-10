#Thème Doculab
===================

Le thème doculab est une boite à outil à destination de tout lieu contributif à la recherche d'une solution de documentation relativement accessible à tous.


----------

##Démarche initiale
-------------

Pour commencer quelques éléments de contexte concernant le développement de cet outil.  Il a été mis en place au [FacLab](doc.faclab.org) en remplacement du [wiki](wiki.faclab.org). L'idée était de permettre une prise en main plus simple de la plateforme de contribution avec une plus grande place offerte aux images et à a mise en page.

> Il est important de noter que la version proposée ici est loin d'être optimale, mais dans l'idée, il s'agit surtout de partager la solution mise en place.

----------

##Prérequis
###Installer Wordpress
Ce thème est associé à une installation wordpress.  Il est conseillé de partir sur une installation propre (je n'ai pas testé à partir d'un installation pré-existante).
Pour installer Wordpress merci de se référer à la documentation officielle : https://fr.wordpress.org/txt-install

###Installer le thème "Gridz"

Le thème "Doculab" est un thème enfant du thème "Gridz", il ne vous sera pas possible de l'installer sans que ce thème ne soit présent sur le système.
Installer des thèmes avec Wordpress :  https://www.codeur.com/cms/aide/installer-theme-wordpress/
Télécharger le thème "gridz" : https://wordpress.org/themes/gridz/
A noter que le thème est pre-packagé  dans le thème doculab :

    /dependencies/gridz.1.0.5.zip

##Installation du thème "Doculab"

###Télécharger & activer le thème : 
Récupérer le thème : https://github.com/cloeduc/doculab
Vous pouvez au choix récupérer l'archive du thème ou, pour faciliter la mise à jour, configurer directement le dépot git dans le dossier :

    wp-content/themes/
Qui doit, à priori, déjà contenir les thèmes suivants : 

    wp-content/themes/twentyfifteen
    wp-content/themes/twentyfourteen
    wp-content/themes/twentythirteen
    wp-content/themes/gridz
Se rendre dans l'interface de gestion  wordpress pour activer le thème

    Apparences > Thèmes > Doculab
Voila, le thème est activé : nous verrons par la suite comment configurer le thème.
### Installer les dépendances :

> Un certain nombre de plugins "requis" pour que le thème fonctionne au mieu. Pour les activer, suivre la procédure suivante : 

Se rendre sur l'inspecteur de dépendance qui a été activé en même temps que le plugin (vous devez avoir une belle notice en haut de votre espace d'administration qui vous indique que plein de choses sont en attente d'être installé) :
> This theme requires the following plugins: Admin Menu Editor, Advanced Custom Fields - Taxonomy Field add-on, Advanced Custom Fields Pro, Auto Upload Images, CDTools Clean Login, CDTools Custom Admin, CDTools How To Contribute, CDTools Main Query Post, CDTools Manager Supported File Type, Co-Authors Plus, Minimum Password Strength, Private Messages For WordPress, Simple Image Sizes, Sweet Custom Dashboard, WP User Avatar and iThemes Security.

> This theme recommends the following plugins: Advanced Custom Fields: Date and Time Picker, Confirm User Registration, Random Post Widget, Simple Custom Post Types, TinyMCE Advanced, User Role Editor, WP Password Generator, WP-DBManager and Wp Lightbox Bank Standard Edition.


Ces plugins sont soient requis, soit très conseillés pour que le système fonctionne de façon optimal : 

	Apparence > Installer les plugins
Installer ensuite chaque plugin souhaité en cliquant sur "Install" (au survol du plugin).
Penser à activer les plugins une fois ceux ci installés.
#### Descriptif des plugins requis :
##### Plugins CD Tools : 
Les plugins CD-tools sont des petites compositions thématiques composées de divers "hacks" connus de Wordpress.
###### CDTools Clean Login
Créer une formulaire de connexion, d'inscription et de récupération de mots de passe, puis l'affiche dans le menu principal du site.
###### CDTools Custom Admin
###### CD Tools How To Contribute
###### 	CDTools Main Query Post
###### CDTools Manager Supported File Type
##### Advenced Custom Fields **PRO**
> Le choix a été fait d'utiliser le plugin "pro" qui nécessite l'achat d'une licence et étends les fonctionnalités du plugin gratuit.   Ce **plugin premium est indispensable** au bon fonctionnement du système.
> http://www.advancedcustomfields.com/
##### Itheme Security
Ce plugin indispensable permet de sécuriser son installation Wordpress à l'aide de trucs et astuces plus ou moins poussés. Il dispose d'un outil d'analyse de sécurité de l'installation poussé. 
Lors de la première visite sur le plugin activé, il vous est proposé un certain nombre d'actions. Il est plus que conseillé d'effectuer un "**One-Click Secure**" 

#### Descriptif des plugins conseillés :
##### Advanced Custom Fields: Date and Time Picker 
##### Admin menu Editor 
##### Co-Authors Plus 
##### Minimum Password Strength 
##### Auto Upload Images 
##### Advanced Custom Fields - Taxonomy Field add-on 
##### Private Messages For WordPress 
##### 	Simple Image Sizes
##### Sweet Custom Dashboard 
##### WP User Avatar 
##### Confirm User Registration 
##### Random Post Widget 
##### Simple Custom Post Types 
##### 	TinyMCE Advanced 
##### User Role Editor
##### WP Password Generator
##### WP-DBManager 
##### Wp Lightbox Bank Standard Edition 
##Configuration du thème
Une fois chaque plugins installés, il faut ensuite passer par la configuration de la plateforme. 
### Configuration de l'affichage
Le thème est configuré pour fonctionner au mieux en mode "sidebar-right". 
Pour configurer le thème : 

    Apparence > Theme Option
Vous pouvez ici choisir les couleurs et logos qui s'afficheront en en-tête du site. Mais il est aussi possible de changer le mode d'affichage du site, et c'est ce qui va nous intéresser.
Le thème "DocuLab" n'a été conçu (mal codé, plus exactement) que pour ne fonctionner sous une seule configuration d'affichage de son thème parent. **C'est un point à améliorer, bien évidement.**
#### Configuration optimale de l'affichage :
> ###Doculab Theme Option :
> #### Fonts & Colors :
> > A votre convenance
> ####  Logo et favicon
> > A votre convenance
> ####  Homepage
> > Number of grid columns : 3
> > Show sidebar along with masonry : check
> #### Post Settings
>> Sidebar Layout : right (première miniature)
>> Show Categories : check
>> Show Tags : uncheck
>> Show Post Navigation : check

### Configuration des menus
De base le thème créer un "main-menu" qui va afficher le bouton de connexion (ne pas y toucher) et le lien vers la page "comment contribuer". Vous pouvez éditer et améliorer ce menu dans : 

    Apparence > Theme Menus
    
   Il est également conseillé de créer de nouveaux menus qui permettrons de configurer la navigation de la plateforme via les sidebars (voir le point suivant)

Pour plus d'information sur les menus : http://codex.wordpress.org/WordPress_Menu_User_Guide

### Configuration des sidebars : 
La seule sidebar utilisée à bon escient dans le thème doculab (en développement, encore une fois) est la "Primary SideBar". C'est avec elle que l'on va venir configurer la navigation interne de la plateforme.

Plus d'information se les sidebars : http://codex.wordpress.org/Appearance_Widgets_Screen

En l'occurence, sur le site doc.faclab.org, nous avons ajouté :
> La barre de recherche (widget "Chercher")
>  Deux menus personnalisés (Widget "Menu personnalisé" associé à deux menus (cf ci dessus))
>  Le widget "Random Post" qui permet de remonter automatiquement certaines ressources au hasard de la plateforme.

C'est à vous de configurer et de décider de la façon dont vous souhaitez configurer ces menus.