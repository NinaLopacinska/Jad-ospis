
# Tytuł projektu: Jadłospis
Opis projektu:
Aplikacja "Jadłospis" została stworzona z myślą o usprawnieniu organizacji oraz oceny systemu żywieniowego w szkołach. Jej głównym celem jest zapewnienie kompleksowego planowania posiłków oraz zbieranie opinii użytkowników, co pozwala na lepsze zrozumienie i odpowiedź na potrzeby społeczności szkolnej. Pracownicy kuchni mogą planować jadłospisy na tydzień do przodu, a każdy posiłek jest dokładnie opisany, co pozwala na efektywne zarządzanie dostawami i przygotowaniem dań dostosowanych do zróżnicowanych potrzeb dietetycznych uczniów. Użytkownicy mogą dodawać opinie i komentarze oraz oceniać potrawy, co pozwala na zbieranie informacji o preferencjach żywieniowych uczniów oraz ich satysfakcji z posiłków​.
Skład Aplikacji:
Strony internetowe:
index.php - Strona początkowa
install.php - Strona do instalacji
mainLogowanie.php - Strona do logowania 
rejestracja.php - Formularz rejestracji
mainAdministrator.php - Panel administratora
mainPracownik.php - Panel pracownika kuchni
mainUczen.php - Panel ucznia
formularzDodajPotrawe.php - Formularz dodawania potrawy
formularzDodajPracownika.php - Formularz dodawania pracownika
formularzJadlospis.php - Formularz edycji jadłospisu
komentarze.php - Formularz dodawania komentarzy
raport.php - Strona generowania raportów
zmianaDanychPracownik.php - Formularz zmiany hasła pracownika
zmianaDanychUczen.php - Formularz zmiany hasła ucznia
usunKontoAdmin.php - Formularz do usunięcia konta dowolnego użytkowika
usunKontoUczen.php - Formularz do usuniecia konta ucznia
usunPotrawe.php - Formularz do usuniecia potrawy z bazy


Baza danych:
Jadlospis - Tabela przechowująca informacje o jadłospisach
Komentarze - Tabela przechowująca komentarze użytkowników
Potrawy - Tabela przechowująca informacje o potrawach
Uzytkownicy - Tabela przechowująca informacje o użytkownikach

## Wymagania systemowe
Apache (wersja 2.4)
PHP (wersja 7.4)
MySQL (wersja 5.7)

## Instalacja
1.	Otwórz program XAMPP Control Panel ma swoim komputerze, następnie przy module Apache oraz MySQL wciśnij start.
2.	Następnie wejdź w plik xampp na dysku C, następnie w plik htdocs (C:\xampp\htdocs) i w tym miejscu wypakuj zawartość pobranego pliku zip. 
3.	Otwórz dowolną przeglądarkę internetową i wpisz „localhost”. Wyświetli się strona z poleceniem.
4.	Wracamy do miejsca gdzie rozpakowaliśmy pobranego zipa i tworzymy w tym miejscy plik „config.php” i wciskamy przycisk na stronie „Odśwież stronę”.
5.	Jeśli pojawi się polecenie o zmianie uprawnień do pliku config.php, zmieniamy je poprzez np. polecenie „chmod a+w config.php”. Następnie wciskamy „odśwież stronę”.
6.	Uzupełniamy dane na stronie:
Serwer: localhost
Nazwa użytkownika: root
Hasło: (to miejsce w moim przypadku jest puste, jeśli hasło jest to trzeba je podać)
Nazwa bazy danych: (tutaj podajemy dowolną UNIKALNĄ nazwę naszej bazy)
Następnie wciskamy „Dalej”.
7.	Podajemy dane administratora, login oraz dwa razy hasło.  Jeśli podaliśmy oba hasła takie same to wciskamy „Zainstaluj”. Jeśli podczas podawania hasła popełniliśmy błąd strona nas o tym poinformuje i konieczny bedzie powrót na stronę z danymi administratora. 
8.	Jeśli wszystko zostało poprawnie uzupełnione powinniśmy otrzymać komunikat o poprawnym dodaniu tabel do bazy oraz o poprawnym stworzeniu konta administratora. 
9.	Postępujemy zgodnie z instrukcją na ekranie, czyli usuwany plik „install.php” oraz modyfikujemy prawa dostępu do pliku „config.php” na tylko do odczytu. Po wykonaniu tych czynności naciskamy „Zakończ instalację”.
10.	Jeśli instalacja się udała to zostaniemy przeniesieni do strony odpowiadającej za logowanie. Możemy zalogować się na konto administratora danymi, które podawaliśmy we wcześniejszych krokach lub wybrać opcje rejestracji i założyć nowe konto z przypisaną rolą ucznia. 


## Autorzy
* **Nina Łopacińska
* *nr  album: 406341 
* *login z manticore'y nina.lop

* **Wiktor Kozak
* *nr  album: 406288 
* *login z manticore'y wik.koz3

* **Maria Małachowska
* *nr  album: 406293 
* *login z manticore'y mmalach

## Wykorzystane zewnętrzne biblioteki
PHP (wersja 7.4)
HTML (wersja 5)
CSS (wersja 3)
JavaScript (ES6)
MySQL (wersja 5.7)
PHPMyAdmin (wersja 4.9) 
Bootstrap (wersja 4.5) 
jQuery (wersja 3.5)