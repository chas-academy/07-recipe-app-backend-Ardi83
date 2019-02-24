Here is finilized link : http://recipe-backend.ardinasiri.chas.academy



# Uppgiften

I denna uppgift ska du bygga vidare på applikationen med ramverket Angular. Applikationen ska nu utökas och fungera både som en samling för recept men också en inhandlingslista över ingredienser som kan användas vid inköp. För denna uppgift kommer ni även att behöva bygga ut ett RESTful API i **Laravel som nyttjas i frontend från föregående uppgift.**

Som användare ska man kunna göra följande:

## Krav

- [ ]  Kunna skrolla genom över förslag på recept
- [ ]  Kunna filtrera förslagen av recept på måltidstyp, allergener eller tillagningstid
    - [ ]  Förrätt, huvudrätt eller dessert
    - [ ]  Allergener och dietval (t.ex. gluten, nötter, vegetarian osv.)
- [ ]  Kunna klicka på ett recept för att se dess information (egen route)
- [ ]  Kunna spara receptet i en lista (redigera/ta bort från lista)

## Övriga krav

Som användare ska man kunna göra följande:

- [ ]  Kunna registrera konto i API:et
    - [ ]  Använd JWT baserade tokens för kommunikation
- [ ]  Spara skapade receptlistor
- [ ]  CRUD på listor
    - [ ]  Samtliga listor måste vara knutna till en användare och får bara ändras/läsas av samma användare

## Extra utmaning

Om du har gott om tid och vill påvisa djupare förståelse och kompetens inom Angular kan du även bygga till några eller alla av följande funktioner:

- Kunna lägga till alla ingredienser från receptet till en inhandlingslista
- Kunna ändra, sortera och ta bort ingredienser från inhandlingslista
- Kunna spara inhandlingslistor
- Användaren kan få recept från flera olika källor (API:er)
- Användaren ska kunna starta timers i tillgangningsinstruktionerna
- Användaren ska kunna skriva ut tillgangningsinstruktionerna i fint format
- Användaren ska kunna dela med sig av recept via sociala nätverk