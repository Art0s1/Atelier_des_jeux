# Atelier_des_jeux

Bienvenue sur le projet **Atelier des jeux** !  
Il s'agit d'une application web permettant de **gérer les problèmes des utilisateurs** via un **système de tickets**, le tout à travers une interface simple et intuitive.

---

##  Écran de connexion

Voici l'écran de **login**, accessible via un bouton "Login" sur la page d'accueil.  
Une **fenêtre pop-up** s'affiche alors pour permettre à l'utilisateur de se connecter.

![Login](https://github.com/user-attachments/assets/acb3f7f8-f66a-4027-beb3-b0ae24c8b323)

---

##  Création de comptes : utilisateurs & administrateurs

Cette fenêtre pop-up offre la possibilité de créer deux types de comptes :

- **Utilisateurs** : créés dans la base de données.
- **Administrateurs** : créés localement dans le fichier `user.password` sur la machine.

Les administrateurs bénéficient d’un accès sécurisé via des panels protégés par **HTAccess**.

![Création comptes](https://github.com/user-attachments/assets/c13f3eb3-7b0b-460e-aa3a-b5013af5c7ad)

---

##  Page d’accueil utilisateur

Une fois connecté, l’utilisateur accède à cette **page d’accueil**.

![Accueil utilisateur](https://github.com/user-attachments/assets/644ebc42-5fc6-4f60-95d8-b7909249d417)

---

##  Création d’un ticket

En cliquant sur le bouton **"Ticket"**, l’utilisateur peut créer un ticket dans la base de données afin de **signaler un problème**.  
Il peut y ajouter une description détaillée.

![Création ticket](https://github.com/user-attachments/assets/2cba9efa-1cc8-441f-abd7-f740694ac59f)

---

## Confirmation de soumission

Une fois le ticket envoyé, l’utilisateur reçoit un message de **confirmation vert** l’informant que sa demande a bien été prise en compte.

![Confirmation](https://github.com/user-attachments/assets/dbfe6189-80c5-49c1-9871-deb5cb8f8e43)

---

## Sécurité du panneau d’administration

L'accès à l'interface d’administration est **protégé par HTAccess** pour garantir une meilleure sécurité.

![HTAccess](https://github.com/user-attachments/assets/fab76f2a-8515-4395-9083-7f6671b67b1d)

---

##  Interface d'administration : tickets & utilisateurs

Voici le **panneau d’administration**, connecté à la base de données.  
Il permet de :

- Visualiser tous les tickets, classés par **code couleur** selon leur statut.
- Trier les tickets du **plus récent au plus ancien**.
- Consulter la liste complète des utilisateurs, **classés selon leur date de création**.

![Dashboard admin](https://github.com/user-attachments/assets/163a6343-3e9b-43be-aa9f-b9d5ae831545)

---

## Gestion des tickets (admin)

Ce panneau affiche les tickets par **ordre d’ID** (du plus récent au plus ancien).  
L’administrateur peut **modifier le statut des tickets en temps réel**, jusqu’à ce que le ticket soit marqué comme **"fermé"**, ce qui signifie qu’il est résolu.

![Gestion tickets](https://github.com/user-attachments/assets/315b74fc-5e2c-4b3f-8df4-72b972b177a8)

---

##  Gestion des utilisateurs

Cette interface permet de consulter les utilisateurs par **ordre alphabétique**.  
L’administrateur peut également **supprimer des utilisateurs** si nécessaire.

![Gestion utilisateurs](https://github.com/user-attachments/assets/e9434b93-6277-44d9-8615-192ae4f071cc)

---

 Ce projet met en avant une gestion claire et sécurisée des interactions utilisateurs/administrateurs autour d’un système de tickets.  
Il peut facilement être adapté à d'autres cas d'usage similaires.
