package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestDev {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost/app/app/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testDev() throws Exception {
    driver.get(baseUrl + "");
    driver.findElement(By.linkText("Developers")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]developers$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertFalse(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.cssSelector("button.btn.btn-link")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]developers&add$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("new_dev_name")).clear();
    driver.findElement(By.name("new_dev_name")).sendKeys("Touati");
    driver.findElement(By.name("new_dev_first_name")).clear();
    driver.findElement(By.name("new_dev_first_name")).sendKeys("Amira");
    driver.findElement(By.name("new_dev_description")).clear();
    driver.findElement(By.name("new_dev_description")).sendKeys("descr");
    driver.findElement(By.cssSelector("button.btn.btn-lg")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]developers$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertTrue(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("VIEW")).click();
    try {
      assertEquals("Touati", driver.findElement(By.cssSelector("td[name=\"view_dev_name\"]")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("Amira", driver.findElement(By.cssSelector("td[name=\"view_dev_first_name\"]")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("descr", driver.findElement(By.cssSelector("td[name=\"view_dev_description\"]")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.get("http://localhost/app/app/?developers");
    driver.findElement(By.cssSelector("a[name=\"EDIT\"] > img")).click();
    driver.findElement(By.name("edit_dev_name")).clear();
    driver.findElement(By.name("edit_dev_name")).sendKeys("Ruffino");
    driver.findElement(By.name("edit_dev_first_name")).clear();
    driver.findElement(By.name("edit_dev_first_name")).sendKeys("Andrea");
    driver.findElement(By.name("edit_dev_description")).clear();
    driver.findElement(By.name("edit_dev_description")).sendKeys("descr2");
    driver.findElement(By.cssSelector("button.btn.btn-lg")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]developers$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("VIEW")).click();
    try {
      assertEquals("Ruffino", driver.findElement(By.cssSelector("td[name=\"view_dev_name\"]")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("Andrea", driver.findElement(By.cssSelector("td[name=\"view_dev_first_name\"]")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("descr2", driver.findElement(By.cssSelector("td[name=\"view_dev_description\"]")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.get("http://localhost/app/app/?developers");
    driver.findElement(By.name("DEL")).click();
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
