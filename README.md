
1. abstract class:  ✅

- extend: everywhere! ✅

- use: 
use : namespace importing
use2: in callbacks... ✅

2. private változó, honnan mit lehet elérni, ez miért jó ✅
2. dátum kezelés, adott dátum 2 dátum között van-e, régebbi, mint 2 hét stb.
3. típusosság, hogy működik a strict mód, mire jó ✅

4. hogy lehet megadni a változó típust, ? mire jó (elvis operator), ✅

   visszatérési érték mi lehet, hogy lehet kideríteni a típusokat, mikor
   szállhatunk hibára
5. Query building (akár o4, akár o5) and_where, or_where, join. Egy
   kis vérfrissítés
6. regex (vagy ez teljesen külön tanfolyam legyen?)
7. refactor lehetőségek (esetleg egy konkrét projekt példáján. Megérteni, mit
   csinál a függvény, végiggondolni a logikát, mit lehet kiszervezni és
   refactoring) typehint megoldások, hogyan kommentezzünk egy függvényt, miként
   tudja ezt használni a Storm ✅
   TODO: commentezések

8. Exception: mikor dobjunk, mikor ne. Mit lehet vele kezdeni (deven kimegy,
   élesen email). Miért veszélyes egy 404 exception ilyenkor, stb.  Mi kerül
   logikailag egy modelbe és mi a controllerbe.
9. Mire jó a decorator, mikor használjuk? ✅
10. Valami olyasmi nagyon érdekes lenne, hogy hogyan lehet egy megoldás után
    kutatni. Ha nem ismerjük a függvényt, hogyan tudjuk kideríteni, hogy mit
    használhatunk, milyen lehetőségünk van. Majd ha beszélgetünk, mondok
    példákat. (pl. Symfony formban akarunk plusz szűrőt. Hogyan tudom meg, hogy
    query szűkítést kell csinálnom és erre mi a függvény?)


- SOLID principles
- indentation csökkentése (fölösleges else ágak, stb..) ✅
- iterator-ok  ✅
- late static binding ✅
- object composition ✅
- self vs static ✅
- static functions ✅
- value objects ✅
- what shows in the console

gyarkorlat:
php7.4-es property typehintek, strict typeing.
arrow function
spred operator
yield
null coalescing && null assigning coalescing operátor
a php8nak is elébe lehet menni, kb fél év múlva jön ki
elmélet:
- A többség nem kapott felsőfokú IT képzést úgyhogy ide mehet bármilyen alapozó tárgyi anyag aminek van értelme phpban
- a solid mint rövidítés mögötti elvek (SRP, OCP, LSP, stb).
- objektum-objektum kapcsolatok (inheritance, composition, aggregation) melyik mikor miért
- PSR-ek

https://github.com/RefactoringGuru/esign-patterns-php

- singleton
- facade
- factory
- decorator
- adapter
- observer

