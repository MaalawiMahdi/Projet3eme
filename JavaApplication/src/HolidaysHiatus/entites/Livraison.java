/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entites;

/**
 *
 * @author noamen
 */
public class Livraison {
    int id;
    String Type;
    Float Prix;
    Boolean Etat;

    public Livraison(int id, String Type, Float Prix, Boolean Etat) {
        this.id = id;
        this.Type = Type;
        this.Prix = Prix;
        this.Etat = Etat;
    }

    public Livraison(String Type, Float Prix, Boolean Etat) {
        this.Type = Type;
        this.Prix = Prix;
        this.Etat = Etat;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getType() {
        return Type;
    }

    public void setType(String Type) {
        this.Type = Type;
    }

    public Float getPrix() {
        return Prix;
    }

    public void setPrix(Float Prix) {
        this.Prix = Prix;
    }

    public Boolean getEtat() {
        return Etat;
    }

    public void setEtat(Boolean Etat) {
        this.Etat = Etat;
    }
    
    
}
