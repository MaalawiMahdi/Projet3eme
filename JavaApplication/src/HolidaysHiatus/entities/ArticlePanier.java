/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author DELL
 */
public class ArticlePanier {
  public  ProduitService p ; 
   public Float t ;
   public String saif ;
   //public Float prix ;

    public ArticlePanier(ProduitService p, Float t, String saif) {
        this.p = p;
        this.t = t;
        this.saif = saif;
    }

    /*public Float getPrix() {
        return prix;
    }*/

    /*public ArticlePanier(ProduitService p, Float t, String saif, Float prix) {
        this.p = p;
        this.t = t;
        this.saif = saif;
        this.prix = prix;
    }*/

    public String getSaif() {
        return saif;
    }

    public ArticlePanier() {
    }

    public ArticlePanier(ProduitService p, Float t) {
        this.p = p;
        this.t = t;
    }

    public ProduitService getP() {
        return p;
    }

    public Float getT() {
        return t;
    }
   
   
   
   
   
}



