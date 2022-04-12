class Feladat{
    constructor(node, adat){
        this.node=node;
        this.adat=adat;
        this.f_szam=this.node.children(".f_szam");
        this.m_szam=this.node.children(".m_szam");
        this.elnevezes=this.node.children(".elnevezes");
        this.dolg_nev=this.node.children(".dolg_nev");
        this.rendszam=this.node.children(".rendszam");

        this.setAdat(this.adat);
    }

    setAdat(adat){
        this.adat=adat;
        this.f_szam.text(this.adat.f_szam);
        this.m_szam.text(this.adat.m_szam);
        this.elnevezes.text(this.adat.elnevezes);
        this.dolg_nev.text(this.adat.dolg_nev);
        this.rendszam.text(this.adat.rendszam);
    }
}
