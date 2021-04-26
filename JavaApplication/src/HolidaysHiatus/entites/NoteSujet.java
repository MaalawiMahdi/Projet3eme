/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

/**
 *
 * @author hp
 */
public class NoteSujet {
    int id;
    int sujet_id;
    int user_id;
    int value;

    @Override
    public String toString() {
        return "NoteSujet{" + "id=" + id + ", sujet_id=" + sujet_id + ", user_id=" + user_id + ", value=" + value + '}';
    }

    public NoteSujet() {
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getSujet_id() {
        return sujet_id;
    }

    public void setSujet_id(int sujet_id) {
        this.sujet_id = sujet_id;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getValue() {
        return value;
    }

    public void setValue(int value) {
        this.value = value;
    }

    public NoteSujet(int sujet_id, int user_id, int value) {
        this.sujet_id = sujet_id;
        this.user_id = user_id;
        this.value = value;
    }

    public NoteSujet(int id, int sujet_id, int user_id, int value) {
        this.id = id;
        this.sujet_id = sujet_id;
        this.user_id = user_id;
        this.value = value;
    }
    
}
