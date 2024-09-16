# Networking-Project



## Introduction

Pour que que le projet puisse fonctionner de votre côté, veuillez tout d'abord vérifier que vous avez
à disposition un IDE (VS Code, PhpStorm) avant d'entamer les procédures.

Et aussi, installer Git Bash pour cloner le projet. Sans cela, rien ne fonctionnera.

## Procédures

**Etape 1**

Que vous ayez un compte Gitlab ou Github, les commandes git resteront les mêmes quelque soit la plateforme de 
gestion des versions. 

Pour que vous ayez le projet dans votre local, veuillez vous rendre sur la page du dépôt que je vous ai partagé. Cliquer sur le bouton Clone et sélectionner le bouton pour copier le lien sous le label Clone with HTTPS.

![My Repository](<Capture d'écran 2024-09-16 102348.png>)

Ensuite, veuillez saisir la commande suivante dans votre terminal : 

```
cd Desktop
git clone https://gitlab.com/hypnoteam/networking-project.git
```

En appliquant ces commandes depuis le terminal, vous devriez normalement voir un nouveau dossier apparaître sur votre Bureau.

**Etape 2**

Maintenant que le projet est sur votre Bureau, il faut encore installer des programmes pour que tout fonctionne.

Pour ma part, j'utilise Wampserver (sur Windows) pour le développement des applications web. Ce ne sera peut-être pas votre cas, mais il existe des équivalents à Wampserver. Les voici : 

Sur Linux : LAMP (Linux, Apache, MySQL, PHP/Python/Perl)

Sur MacOS : MAMP (MacOS, Apache, MySQL, PHP/Python/Perl), XAMPP (également disponible sur Windows et Linux, mais n'utilise que Apache, MariaDB et PHP)

À choisir en fonction de votre système d'exploitation de base.

Au cours de l'installation, veillez à bien suivre les instructions. Vous aurez peut-être d'autres installations à réaliser.

**Etape 3**

Comme le projet est développé sous Symfony, je vous recommande d'installer Composer via le lien suivant : https://getcomposer.org/.

Si tout se passe bien, taper les commandes suivantes depuis votre terminal :

```
composer
composer -V
```

Vous devriez pouvoir visualiser de nouvelles lignes de commandes et la version de Composer.

Et pour finir, il vous restera à installer Symfony : https://symfony.com/download. Pareil que Composer, taper :

```
symfony
symfony -V
```

## Lancement du projet

Ouvrir votre IDE > Fichier > Ouvrir le dossier > networking-project.

Ouvrir le terminal de votre IDE.

Taper : 

```
cd networking-app
symfony serve
```

**Accès à l'interface d'administration**

Pour accéder à l'interface d'administration, connectez-vous sur l'application web avec les identifants suivants :

E-mail : a.bertomier@outlook.fr
Mot de passe : PasswordTest

Sur l'url, ajouter /admin.

## Mise en garde

**Version de PHP**

Je tiens à souligner que Symfony sera très demandant sur la version de PHP. Si vous avez installé la dernière version de PHP, il faudra que vous configuriez le fichier composer.json avec cette même version. 

![Configuration composer.json](<Capture d'écran 2024-09-16 120011.png>)

Taper sur le terminal de votre IDE:

```
cd networking-app
composer update
composer update "symfony/*"
```

**Identifiants et base de données**

Pour des raisons de sécurité, je vous prie de bien vouloir modifier les identifiants et de ne pas utiliser les miens sur le fichier .env qui se situe dans le sous-répertoire networking-app.

La base de données se situe dans la racine du projet (networking_app.sql). Assurez-vous de créer la base de données avec le même nom et de l'importer.

**Mailer**

Pour le MAILER_DSN sur le fichier .env, il faudra vous créer un compte mailtrap (https://mailtrap.io/) et changer les identifiants SMTP que la plateforme vous aura fourni.

![Set mailtrap credentials](<Capture d'écran 2024-09-16 170533.png>)