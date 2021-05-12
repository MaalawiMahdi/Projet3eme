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
public class CategorieBoard {
     public int id;
    public String titre;
    public String pic;
public CategorieBoard()
{
    
}
    public CategorieBoard(int id, String titre, String pic) {
        this.id = id;
        this.titre = titre;
        this.pic = pic;
    }
    public CategorieBoard(CategorieBoard a) {
        this.id = id;
        this.titre = titre;
        this.pic = pic;
    }
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
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
        return "CategorieBoard{" + "id=" + id + ", titre=" + titre + ", pic=" + pic + '}';
    }
    
}
