using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Jarmuvek
{
    class Jarmu
    {
        public string tipus { get; private set; }
        public int ar { get; private set; }
        private List<int> felulvizsgalatok;

        public Jarmu(string tipus, int ar)
        {
            this.tipus = tipus;
            this.ar = ar;
            felulvizsgalatok = new List<int>();
        }

        public virtual void Felulvizsgalat(int ev)
        {
            if (felulvizsgalatok.Count > 5)
            {
                throw new Exception($"{this}, nem adható több felülvizsgálat");
            }
            felulvizsgalatok.Add(ev);
        }

        public int UtolsoFelulvizsgalat
        {
            get
            {
                if (felulvizsgalatok.Count == 0)
                {
                    throw new Exception($"{this}, még nincs felülvizsgálat megadva");
                }
                return felulvizsgalatok.Last();
            }
        }

        public override string ToString()
        {
            return $"típus: {tipus}, ár: {ar}";
        }
    }
}
