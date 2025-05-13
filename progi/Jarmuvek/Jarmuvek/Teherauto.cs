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
    class Teherauto : Jarmu, ITerhelheto
    {
        public int maxTerheles { get; private set; }
        public Teherauto(int maxTerheles, string tipus, int ar) : base(tipus, ar)
        {
            this.maxTerheles = maxTerheles;
        }

        public override void Felulvizsgalat(int ev)
        {
            if (ev % 2 == 0)
            {
                base.Felulvizsgalat(ev);
            }
        }

        public int MaxTerheles
        {
            get { return maxTerheles; }
        }

        public int TerhelesKiszamit(int suly)
        {
            if (suly > maxTerheles)
            {
                return suly - maxTerheles;
            }
            return 0;
        }

        public override string ToString()
        {
            return base.ToString() + $", max terhelés: {MaxTerheles}";
        }

    }
}
