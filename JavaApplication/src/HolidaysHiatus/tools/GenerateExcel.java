/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import HolidaysHiatus.entites.JavamailUtil;
import HolidaysHiatus.entites.Societe;
import java.awt.Desktop;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;

import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.CellStyle;
import org.apache.poi.ss.usermodel.Font;
import org.apache.poi.ss.usermodel.IndexedColors;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

/**
 *
 * @author mahdi
 */
public class GenerateExcel {
    public void createExcel(List <Societe> ListSociete , String [] columns ){
    
Workbook workbook = new HSSFWorkbook();
Sheet sheet = workbook.createSheet("Societes");
Font headerFont = workbook.createFont();
headerFont.setBold(true);
headerFont.setFontHeightInPoints((short) 14);
headerFont.setColor(IndexedColors.RED.getIndex());
CellStyle headerCellStyle = workbook.createCellStyle();
headerCellStyle.setFont(headerFont);
// Create a Row
    Row headerRow = sheet.createRow(0);

    for (int i = 0; i < columns.length; i++) {
      Cell cell = headerRow.createCell(i);
      cell.setCellValue(columns[i]);
      cell.setCellStyle(headerCellStyle);
    }
    int rowNum = 1;

    for (Societe Scoeite : ListSociete) {
      Row row = sheet.createRow(rowNum++);
      row.createCell(0).setCellValue(Scoeite.getNumregistre());
      row.createCell(1).setCellValue(Scoeite.getNom());
      row.createCell(2).setCellValue(Scoeite.getType());
      row.createCell(3).setCellValue(Scoeite.getAdresse());
    }

    // Resize all columns to fit the content size
    for (int i = 0; i < columns.length; i++) {
      sheet.autoSizeColumn(i);
    }

    // Write the output to a file
        try {
                FileOutputStream fileOut = new FileOutputStream("Societe.xlt");

            workbook.write(fileOut);
                fileOut.close();
Desktop.getDesktop().open(new File("C:\\Users\\mahdi\\Desktop\\Projet3eme\\JavaApplication\\Societe.xlt"));

        } catch (IOException ex) {
            Logger.getLogger(GenerateExcel.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

   
    public void createExcelAndSendToMail(String mail, List<Societe> ListSociete, String[] columns) {
  
Workbook workbook = new HSSFWorkbook();
Sheet sheet = workbook.createSheet("Societes");
Font headerFont = workbook.createFont();
headerFont.setBold(true);
headerFont.setFontHeightInPoints((short) 14);
headerFont.setColor(IndexedColors.RED.getIndex());
CellStyle headerCellStyle = workbook.createCellStyle();
headerCellStyle.setFont(headerFont);
// Create a Row
    Row headerRow = sheet.createRow(0);

    for (int i = 0; i < columns.length; i++) {
      Cell cell = headerRow.createCell(i);
      cell.setCellValue(columns[i]);
      cell.setCellStyle(headerCellStyle);
    }
    int rowNum = 1;

    for (Societe Scoeite : ListSociete) {
      Row row = sheet.createRow(rowNum++);
      row.createCell(0).setCellValue(Scoeite.getNumregistre());
      row.createCell(1).setCellValue(Scoeite.getNom());
      row.createCell(2).setCellValue(Scoeite.getType());
      row.createCell(3).setCellValue(Scoeite.getAdresse());
    }

    // Resize all columns to fit the content size
    for (int i = 0; i < columns.length; i++) {
      sheet.autoSizeColumn(i);
    }

    // Write the output to a file
        try {
                FileOutputStream fileOut = new FileOutputStream("Societe.xlt");

            workbook.write(fileOut);
                fileOut.close();
        Desktop.getDesktop().open(new File("C:\\Users\\mahdi\\Desktop\\Projet3eme\\JavaApplication\\Societe.xlt"));
JavamailUtil.sendMailWithFile(mail, "Liste des societe ", "Lise des societe", "C:\\Users\\mahdi\\Desktop\\Projet3eme\\JavaApplication\\Societe.xlt");
        } catch (IOException ex) {
            Logger.getLogger(GenerateExcel.class.getName()).log(Level.SEVERE, null, ex);
        } catch (Exception ex) {
            Logger.getLogger(GenerateExcel.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
