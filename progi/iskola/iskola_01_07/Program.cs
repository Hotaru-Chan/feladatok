using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace iskola_01_07
{
    class Program
    {
        static void Main(string[] args)
        {
            List<iskola> diakok = new List<iskola>();
            foreach(var item in File.ReadAllLines("nevek.txt")){
                diakok.Add(new iskola(item));
            }

            //3. feladat - tanulók száma
            Console.WriteLine($"3. feladat: Az iskolába {diakok.Count()} tanuló jár");

            //4. feladat - leghosszabb név
            int max = diakok.Max(x => x.nev.Replace(" ", "").Length);

            Console.WriteLine($"4. feladat: A leghosszabb ({max} karakter) nevű tanuló(k): ");
            for (int i =0; i<diakok.Count; i++)
            {
                if(diakok[i].nev.Replace(" ", "").Length == max)
                {
                    Console.WriteLine($"\t {diakok[i].nev}");
                }
            }

            //5. feladat - azonosító
            Console.WriteLine("5. feladat: Azonosítók");
            Console.WriteLine($"\t Első: {diakok[0].nev} - {diakok[0].azonosito()}");
            Console.WriteLine($"\t Utolsó: {diakok.Last().nev} - {diakok.Last().azonosito()}");

            //6. feladat - azonosító bekérése
            Console.Write("6. feladat: Kérek egy azonosítót [pl.: 4dvavkri]: ");
            string azon = Console.ReadLine();
            iskola keresettdiak = diakok.Find(x => x.azonosito() == azon);
            Console.WriteLine(keresettdiak==null ? "Nincs megfelelő tanuló" : $"\t {keresettdiak.ev} {keresettdiak.osztaly} {keresettdiak.nev}");


            //7. feladat - jelszó generálása
            Random rnd = new Random();
            JelszóGeneráló jelszo = new JelszóGeneráló(rnd);
            Console.WriteLine("7. feladat: Jelszó generálás");
            Console.WriteLine($"\t {diakok[rnd.Next(diakok.Count)].nev} - {jelszo.Jelszó(8)}");

        }
    }
}
