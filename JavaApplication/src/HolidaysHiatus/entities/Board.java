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
    public String titre;
    public String pic;

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

    @Override
    public String toString() {
        return "Board{" + "id=" + id + ", categorie_id=" + categorie_id + ", titre=" + titre + ", pic=" + pic + '}';
    }
    
}
