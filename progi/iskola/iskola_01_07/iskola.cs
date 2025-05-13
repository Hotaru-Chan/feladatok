using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace iskola_01_07
{
    class iskola
    {
        public int ev;
        public char osztaly;
        public string nev;

        public iskola(string sor)
        {
            ev = Convert.ToInt32(sor.Split(";")[0]);
            osztaly = Convert.ToChar(sor.Split(";")[1]);
            nev = sor.Split(";")[2];
        }

        //5. feladat - azonosító
        public string azonosito()
        {
            return ev.ToString()[3] + osztaly.ToString() + nev.Substring(0, 3).ToLower() + nev.Split(" ")[1].Substring(0, 3).ToLower();
        }
    }
}
