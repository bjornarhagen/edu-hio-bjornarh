# Fast* - del 1
*Ikke faktisk fasit. Har bare kjørt koden og sett hva resultatet ble*

---

## Oppgave 1.1
*Hva blir utskriften fra følgende kode?*
```
    var a = 5;
    var b = 4;
    var c = a+b;
    a = 6;
 
    document.getElementById("utskrift").innerHTML = c;
```
### Svar
`9`

---

## Oppgave 1.2     
*Hva blir utskriften fra følgende kode?*
```
    var a = 5;
    var b = 4;

    if(a < b) {
        document.getElementById("utskrift").innerHTML = a;
    }
    else {
        document.getElementById("utskrift").innerHTML = b;
    }
```
### Svar
`4`

---

## Oppgave 1.3     
*Hva blir utskriften fra følgende kode?* 
```
    var a = 4;
    var b = 5;
     
    if(a < b) {
          a=b;
    }
    if(a === b) {
          b=a;
    }
 
    document.getElementById("utskrift").innerHTML = a + "-" + b;​
```
### Svar
`5-5`

---

## Oppgave 1.4
*Hva blir utskriften fra følgende kode?*
 ```
    var a = "5";
    var b = "4";
     
    document.getElementById("utskrift").innerHTML = a + b;
 ```
### Svar
`54`

---

## Oppgave 1.5
*Hva blir utskriften fra følgende kode?*
```
    var arr = [4,2,7,3,8,4];
    var e = arr[1] + arr[arr.length - 1];

    document.getElementById("utskrift").innerHTML = e;
```
### Svar
`6`

---

## Oppgave 1.6
*Hva blir utskriften fra følgende kode?*
```
    var a = 4;
    a *= 2;
    a++;
    a--;
    a = a + 1;
     
    document.getElementById("utskrift").innerHTML = a;
```
### Svar
`9`

---

## Oppgave 1.7
*Hva blir utskriften fra følgende kode?*
```
    var e = 0;
    for(var i = 0; i < 9; i++) {
        e++;
        e = e % 2;
    }

    document.getElementById("utskrift").innerHTML = e;
```
### Svar
`1`

---

## Oppgave 1.8
*Hva blir utskriften fra følgende kode?*
```
    var arr = [4,2,7,3,8,4];
    var e = 0;
     
    for(var i = 0; i < arr.length; i++) {
        if(arr[i] > 5) {
            e += arr[i];
        }
        else {
            e++;
        }
    }
     
    document.getElementById("utskrift").innerHTML = e;
```
 
### Svar 
`19`

---

## Oppgave 1.9
*Hva blir utskriften fra følgende kode?*
```
    var a = 4;
    var b = 3;
     
    if( a > b) {
        document.getElementById("utskrift").innerHTML = "A";
    }
    else if (a > 0) {
        document.getElementById("utskrift").innerHTML = "B";
    }
    else {
        document.getElementById("utskrift").innerHTML = "C";
    }
```
### Svar 
`A`

---

##Oppgave 1.10
*Hva blir utskriften fra følgende kode? I dette tilfellet vill siste kodelinje stå i ”oppstarts-funksjonen”, mens selve funksjonen er definert for seg selv.*
```
    function test(a,b) {
        if (a === b) {
            return a;
        }
        else {
            return b;
        }
    }
     
    document.getElementById("utskrift").innerHTML = test(4,test(2,5));
```
### Svar
`5`

---

## Oppgave 1.11
*Hva blir utskriften fra følgende kode?*
```
    var a = 5;
    document.getElementById("utskrift").innerHTML = ( a > 3 ? "A" : "B");
```
### Svar 
`A`

---

## Oppgave 1.12
*Hva blir utskriften fra følgende kode?*
```
    var res = "";
     
    for(var i = 0; i < 3; i++) {
        res += i + ",";
    }
     
    document.getElementById("utskrift").innerHTML = res;
```
### Svar 
`0,1,2,`

---

## Oppgave 1.13
*Hva blir utskriften fra følgende kode?*
```
    var res = "";
     
    for(var i = 0; i < 2; i++) {
        for(var j = 0; j < 2; j++) {
            res += "#" + i + "," + j + "#";
        }
    }
     
    document.getElementById("utskrift").innerHTML = res;
```
### Svar 
`#0,0##0,1##1,0##1,1#`

---

## Oppgave 1.14
*Hva blir utskriften fra følgende kode?*
```
    var i = 0;
    while(i < 10){
        i++;
    }
     
    document.getElementById("utskrift").innerHTML = i;
```
### Svar 
`10`

---

## Oppgave 1.15
*Hva blir utskriften fra følgende kode?*
```
    var a = "Hei på deg";
    var b = a.split(" ");
    var c = 0;
     
    for(var i = 0; i < b.length; i++) {
          c += b[i].length;
    }
     
    document.getElementById("utskrift").innerHTML = c;
```
### Svar  
`8`