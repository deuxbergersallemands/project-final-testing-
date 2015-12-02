package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestUserStory {
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
  public void testUserStory() throws Exception {
    driver.get(baseUrl + "");
    driver.findElement(By.linkText("Backlog")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]userstories$"));
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
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]userstories&add$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("new_us_identifier")).clear();
    driver.findElement(By.name("new_us_identifier")).sendKeys("us1");
    driver.findElement(By.name("new_us_summary")).clear();
    driver.findElement(By.name("new_us_summary")).sendKeys("je veux....");
    driver.findElement(By.name("new_us_priority")).clear();
    driver.findElement(By.name("new_us_priority")).sendKeys("1");
    driver.findElement(By.name("new_us_difficulty")).clear();
    driver.findElement(By.name("new_us_difficulty")).sendKeys("2");
    driver.findElement(By.name("new_us_description")).clear();
    driver.findElement(By.name("new_us_description")).sendKeys("descr");
    driver.findElement(By.cssSelector("button.btn.btn-lg")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]userstories$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertTrue(isElementPresent(By.cssSelector("table.table-list")));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("us1", driver.findElement(By.cssSelector("td.table-td")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("VIEW")).click();
    try {
      assertEquals("us1", driver.findElement(By.id("view_us_identifier")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("je veux....", driver.findElement(By.id("view_us_summary")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("1", driver.findElement(By.id("view_us_priority")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("2", driver.findElement(By.id("view_us_difficulty")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("todo", driver.findElement(By.id("view_us_state")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("descr", driver.findElement(By.id("view_us_description")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("", driver.findElement(By.id("view_us_duration")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.get("http://localhost/app/app/?userstories");
    driver.findElement(By.cssSelector("a[name=\"EDIT\"] > img")).click();
    driver.findElement(By.name("edit_us_identifier")).clear();
    driver.findElement(By.name("edit_us_identifier")).sendKeys("us2");
    driver.findElement(By.name("edit_us_summary")).clear();
    driver.findElement(By.name("edit_us_summary")).sendKeys("je souhaite...");
    driver.findElement(By.name("edit_us_priority")).clear();
    driver.findElement(By.name("edit_us_priority")).sendKeys("2");
    driver.findElement(By.name("edit_us_difficulty")).clear();
    driver.findElement(By.name("edit_us_difficulty")).sendKeys("1");
    driver.findElement(By.name("edit_us_description")).clear();
    driver.findElement(By.name("edit_us_description")).sendKeys("descr2");
    driver.findElement(By.cssSelector("button.btn.btn-lg")).click();
    try {
      assertTrue(driver.getCurrentUrl().matches("^http://localhost/app/app/[\\s\\S]userstories$"));
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.findElement(By.name("VIEW")).click();
    try {
      assertEquals("us2", driver.findElement(By.id("view_us_identifier")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("je souhaite...", driver.findElement(By.id("view_us_summary")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("2", driver.findElement(By.id("view_us_priority")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("1", driver.findElement(By.id("view_us_difficulty")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("todo", driver.findElement(By.id("view_us_state")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("descr2", driver.findElement(By.id("view_us_description")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    try {
      assertEquals("", driver.findElement(By.id("view_us_duration")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
    driver.get("http://localhost/app/app/?userstories");
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
