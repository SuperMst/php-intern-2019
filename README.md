# Tema curs 2

Pornind de la sedinta 2 de curs, creati un CRUD(CREATE, READ, UPDATE, DELETE) pentru Companies si un CRUD pentru Employees. 
Nu uitati sa creati seedere pentru Companies si Employees, folosind [factory](https://laravel.com/docs/5.8/seeding#using-model-factories) .
Modul in care se implementeaza atat partea de server cat si partea vizuala sunt la libera alegere.
Puteti folosi si Bootstrap pentru partea de FRONTEND.

# Tema curs 1

## 1. MVC model
   Vizionati acest [video](https://www.youtube.com/watch?v=1IsL6g2ixak)

## 2. Cont Github
Creati un cont pe Github (**daca nu aveti**) si faceti **fork** la [proiect](https://github.com/RowebDev/php-intern-2019.git)

## 3. Laracasts
Vizionati capitolele **01 - 09** din [Laravel from Scratch](https://laracasts.com/series/laravel-from-scratch-2018)

## 4. Proiect
Installati [**XAMPP**](https://www.apachefriends.org/ro/index.html).
Creati un host nou *http://tema1.local* in **XAMPP**.
Instalati **Laravel**, in folderul unde ati fork-uit proiectul Roweb, asa cum ati vazut pe [Laracasts](https://laracasts.com/series/laravel-from-scratch-2018)
Creati o baza de date noua, cu numele *practica2019*. Creati **doua** tabele denumite *companies* si *employees*. Adaugati date de test in cele 2 tabele. Campurile lor sunt:
    
    Tabel companies
        - id [unsigned int - cheie primara]
        - name [varchar 32]
        - description [text]
    Tabel employees
        - id [unsigned int - cheie primara]
        - company_id [int - cheie straina]
        - name [varchar 32]
Exportati si baza de date in fisierul **db.sql**, in radacina proiectului. Commit pe GIT cu tot proiectul, in repo-ul fork-uit de voi.