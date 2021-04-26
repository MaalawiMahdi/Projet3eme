/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.Sujet;
import HolidaysHiatus.services.SujetService;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.PieChart.Data;

/**
 * FXML Controller class
 *
 * @author hp
 */
public class StatSujetsController implements Initializable {

    @FXML
    private PieChart stats;
    int boardid;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO

    }

    public void setBoardid(int bid) {
        this.boardid = bid;
    }

    public void stats() {
        SujetService ss = new SujetService();
        ObservableList<Data> pieData = FXCollections.observableArrayList();
        for (int i = 0; i < ss.afficherSujetParBoard(boardid).size(); i++) {
            pieData.add(new PieChart.Data(ss.afficherSujetParBoard(boardid).get(i).getTitre() + " : " + ss.NoteMoyenne(ss.afficherSujetParBoard(boardid).get(i)), ss.NoteMoyenne(ss.afficherSujetParBoard(boardid).get(i))));
        }
        stats.setData(pieData);

    }

}
