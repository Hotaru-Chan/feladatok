using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ugynokseg_11_12
{
    class Ingatlan
    {
        //1 feladat
        private int iranyar, telekmeret;
        private string cim;
        protected string tipus;

        //2. feladat
        public string Cim
        {
            get { return cim; } //olvasható, elérjük az értékét
            set { cim = value; }  //írható,értéket lehet adni
        }

        //3. feladat
        public int Iranyar
        {
            get { return iranyar; }
            set
            {
                if (value <= 100000)
                {
                    throw new Exception("Az irányárnak 100000-nél nagyobbnak kell lennie");
                }
                iranyar = value;

            }
        }

        //4. feladat
        public int Telekmeret
        {
            get { return telekmeret; }
            set
            {
                if (value < 10)
                {
                    throw new Exception("A telekméret nem lehet kisebb, mint 10 m2");
                }
                telekmeret = value;
            }
        }

        //5. feladat
        public Ingatlan(string _cim, int _telekmeret, int _iranyar)
        {
            cim = _cim;
            Telekmeret = _telekmeret;
            Iranyar = _iranyar;

        }

        public Ingatlan(string _cim, int _telekmeret)
        {
            cim = _cim;
            Telekmeret = _telekmeret;
            iranyar = 1000000;
        }

        //6. feladat
        public override string ToString()
        {
            return $"{cim}-i, {telekmeret} m2-es {tipus} eladó {iranyar} Ft-ért";
        }
    }
}
