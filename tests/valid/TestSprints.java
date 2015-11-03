package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestSprints {
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
  public void testSprints() throws Exception {
    driver.get(baseUrl + "/app/app/");
    driver.findElement(By.linkText("Sprints")).click();
    try {
      assertFalse(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]sprints$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.cssSelector("button.btn.btn-link")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]sprints&add$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertFalse(isElementPresent(By.cssSelector("button.btn.btn-link")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("new_sprint_identifier")).clear();
    driver.findElement(By.name("new_sprint_identifier")).sendKeys("sprint1");
    driver.findElement(By.name("new_sprint_duration")).clear();
    driver.findElement(By.name("new_sprint_duration")).sendKeys("2");
    driver.findElement(By.name("new_sprint_description")).clear();
    driver.findElement(By.name("new_sprint_description")).sendKeys("un sprint de 2 semaines");
    driver.findElement(By.cssSelector("button.btn.btn-lg")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]sprints$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertTrue(isElementPresent(By.cssSelector("div.content")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertTrue(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("sprint1", driver.findElement(By.cssSelector("td.table-td")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("view")).click();
    try {
      assertEquals("sprint1", driver.findElement(By.cssSelector("td.table-td")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertTrue(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.linkText("Sprints")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]sprints$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("edit")).click();
    driver.findElement(By.name("edit_sprint_identifier")).clear();
    driver.findElement(By.name("edit_sprint_identifier")).sendKeys("sprint2");
    driver.findElement(By.cssSelector("button.btn.btn-lg")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]sprints$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("sprint2", driver.findElement(By.cssSelector("td.table-td")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("del")).click();
    try {
      assertFalse(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
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
