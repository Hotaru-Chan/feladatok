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
    class Hajo : Jarmu, ITerhelheto
    {
        public int maxUtas { get; private set; }

        public Hajo(int maxUtas, string tipus, int ar) : base(tipus, ar)
        {
            this.maxUtas = maxUtas;
        }

        public int MaxTerheles
        {
            get { return maxUtas * 100; }
        }

        public int TerhelesKiszamit(int suly)
        {

            return suly - MaxTerheles;
        }

        public override string ToString()
        {
            return base.ToString() + $", max terhelés: {MaxTerheles}";
        }

    }
}
