using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Jarmuvek
{
    class Motor : Jarmu
    {
        public int teljesitmeny { get; private set; }

        public Motor (int teljesitmeny, string tipus, int ar) : base(tipus, ar)
        {
            this.teljesitmeny = teljesitmeny;
        }

        public override void Felulvizsgalat(int ev)
        {
            if (teljesitmeny > 100 && ev % 2 == 1)
            {
                base.Felulvizsgalat(ev);
            }
        }

        public double Gyorsulas (int sebesseg)
        {
            if (sebesseg == 0)
            {
                throw new Exception("A sebesség nem lehet 0");
            }
            return teljesitmeny / (sebesseg + 10);
        }
    }
}
