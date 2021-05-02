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
   public int quantite ;
   //public Float prix ;

    public ArticlePanier(ProduitService p, int quantite) {
        this.p = p;
        this.quantite = quantite;
    }

    public ProduitService getP() {
        return p;
    }

    public void setP(ProduitService p) {
        this.p = p;
    }

    public int getQuantite() {
        return quantite;
    }

    public void setQuantite(int quantite) {
        this.quantite = quantite;
    }

    @Override
    public String toString() {
        return "ArticlePanier{" + "p=" + p + ", quantite=" + quantite + '}';
    }

}




