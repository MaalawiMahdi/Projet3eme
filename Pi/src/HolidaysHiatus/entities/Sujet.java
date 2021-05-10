/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

import javafx.scene.control.Button;

/**
 *
 * @author hp
 */
public class Sujet {
    private int id;
    private int board_id;
    private String titre;
    private String description;
    private String lien_image;

    public Sujet() {
    }

    public Sujet(int board_id, String titre, String description, String lien_image) {
        this.board_id = board_id;
        this.titre = titre;
        this.description = description;
        this.lien_image = lien_image;
    }

    public Sujet(int id, String titre, String description) {
        this.id = id;
        this.titre = titre;
        this.description = description;
    }

    public Sujet(int id) {
        this.id = id;
    }

    public Sujet(int id, int board_id, String titre, String description, String lien_image) {
        this.id = id;
        this.board_id = board_id;
        this.titre = titre;
        this.description = description;
        this.lien_image = lien_image;
    }

    @Override
    public String toString() {
        return "Sujet{" + "id=" + id + ", board_id=" + board_id + ", titre=" + titre + ", description=" + description + ", lien_image=" + lien_image + '}';
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getBoard_id() {
        return board_id;
    }

    public void setBoard_id(int board_id) {
        this.board_id = board_id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getLien_image() {
        return lien_image;
    }

    public void setLien_image(String lien_image) {
        this.lien_image = lien_image;
    }
    
    
}
