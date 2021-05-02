/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author AMINE
 */
public class Board {
    public int id;
    public int categorie_id;
    public int societe_id;
    public String titre;
    public String pic;
    public int nbr_vue; 

    public Board(int id, int categorie_id, String titre, String pic, int nbr_vue) {
        this.id = id;
        this.categorie_id = categorie_id;
        this.titre = titre;
        this.pic = pic;
        this.nbr_vue = nbr_vue;
    }
    

    public int getNbr_vue() {
        return nbr_vue;
    }

    public void setNbr_vue(int nbr_vue) {
        this.nbr_vue = nbr_vue;
    }
    public Board()
    {
    }
    public Board(int id)
    {
    }
    public Board(int id, int categorie_id, String titre, String pic) {
        this.id = id;
        this.categorie_id = categorie_id;
        this.titre = titre;
        this.pic = pic;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getCategorie_id() {
        return categorie_id;
    }

    public void setCategorie_id(int categorie_id) {
        this.categorie_id = categorie_id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }

    public Board(int id, int categorie_id, int societe_id, String titre, String pic, int nbr_vue) {
        this.id = id;
        this.categorie_id = categorie_id;
        this.societe_id = societe_id;
        this.titre = titre;
        this.pic = pic;
        this.nbr_vue = nbr_vue;
    }

    public int getSociete_id() {
        return societe_id;
    }

    public void setSociete_id(int societe_id) {
        this.societe_id = societe_id;
    }

    @Override
    public String toString() {
        return "Board{" + "id=" + id + ", categorie_id=" + categorie_id + ", societe_id=" + societe_id + ", titre=" + titre + ", pic=" + pic + ", nbr_vue=" + nbr_vue + '}';
    }
    
    

    
}
