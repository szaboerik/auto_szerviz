class Feladat{
    constructor(node, adat){
        this.node=node;
        this.adat=adat;
        this.f_szam=this.node.children(".f_szam");
        this.m_szam=this.node.children(".m_szam");
        this.jelleg=this.node.children(".jelleg");
        this.szerelo=this.node.children(".szerelo");

        this.setAdat(this.adat);
    }

    setAdat(adat){
        this.adat=adat;
        this.f_szam.text(this.adat.f_szam);
        this.m_szam.text(this.adat.m_szam);
        this.jelleg.text(this.adat.jelleg);
        this.szerelo.text(this.adat.szerelo);
    }
}
