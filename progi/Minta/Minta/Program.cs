using System;
using System.Collections.Generic;

namespace Minta
{
    class Program
    {
        static void Main(string[] args)
        {
            List<Ososztaly> lista = new List<Ososztaly>
            {
                new Gyerekosztaly("dinnye", 15, 6, "alma"),
                new Gyerekosztaly("korte", 2, 4, "meggy")
            };

            //törlés
            lista.RemoveAll(X => X.Adattag4 == "alma");

            foreach (var item in lista)
            {
                Console.WriteLine(item);
            }
        }
    }
}
