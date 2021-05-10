/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package CubicChart;



import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.services.AideService;
import com.codename1.charts.ChartComponent;
import com.codename1.charts.models.XYMultipleSeriesDataset;
import com.codename1.charts.renderers.XYMultipleSeriesRenderer;
import com.codename1.charts.renderers.XYSeriesRenderer;
import com.codename1.charts.views.CubicLineChart;
import com.codename1.charts.views.PointStyle;
import com.codename1.ui.Component;
import com.codename1.ui.Form;


import java.util.ArrayList;
import java.util.List;

import com.codename1.charts.util.ColorUtil;
import com.codename1.ui.Display;
import com.codename1.ui.Font;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

/**
 *
 * @author LENOVO
 */
public class CubicChart  extends AbstractDemoChart {
    List <Aide> m=new ArrayList<Aide>(AideService.getInstance().statdata());
    
    private XYMultipleSeriesDataset dataSet;
    /**
     * Returns the chart name.
     *
     * @return the chart name
     */
    public String getName() {
        return "";
    }
   
    /**
     * Returns the chart description.
     *
     * @return the chart description
     */
    public String getDesc() {
        return "(cubic line chart)";
    }

    public Component getChartModelEditor() {
        XYMultipleSeriesEditor x = new XYMultipleSeriesEditor();
       
        x.init(getDataSet());
        return x;
    }

    public String getChartTitle() {
        return "Avg. Cubic Chart";
    }
    
    private XYMultipleSeriesDataset getDataSet() {
        if(dataSet == null) {
            dataSet = createTemperatureDataset(new ArrayList(AideService.getInstance().statdata()));
        }
        return dataSet;
    }

    @Override
    public Component execute() {
 
        int[] colors = new int[]{ColorUtil.BLUE, ColorUtil.GREEN, ColorUtil.CYAN, ColorUtil.MAGENTA};
        PointStyle[] styles = new PointStyle[]{PointStyle.CIRCLE, PointStyle.DIAMOND,
            PointStyle.TRIANGLE, PointStyle.SQUARE};
        XYMultipleSeriesRenderer renderer = buildRenderer(colors, styles);
        int length = renderer.getSeriesRendererCount();
        for (int i = 0; i < length; i++) {
            ((XYSeriesRenderer) renderer.getSeriesRendererAt(i)).setFillPoints(true);
        }
        setChartSettings(renderer, "moyenne des notes Aide", "Aide", "moyenne des notes", 0.5, 12.5, 0, 32,
                ColorUtil.LTGRAY, ColorUtil.LTGRAY);
        renderer.setXLabels(12);
        renderer.setYLabels(10);
        renderer.setShowGrid(true);
        renderer.setXLabelsAlign(Component.RIGHT);
        renderer.setYLabelsAlign(Component.RIGHT);
        renderer.setZoomButtonsVisible(true);
        renderer.setPanLimits(new double[]{1, 2, 3, 4,5});
        renderer.setPanEnabled(true);
        renderer.setZoomEnabled(true);
        renderer.setZoomLimits(new double[]{1, 2, 3, 4,5});
       // renderer.setLabelsTextSize(4);
        //renderer.setScale(10);
        initRendererer(renderer);
    
       
        CubicLineChart chart = new CubicLineChart(
                
                getDataSet(),
                renderer,
                0.33f
        );
        ChartComponent c = newChart(chart);
        return c;

    }

}
    

