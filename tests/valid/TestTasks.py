# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException
from selenium.common.exceptions import NoAlertPresentException
import unittest, time, re

class TestTasks(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.implicitly_wait(30)
        self.base_url = "http://localhost/app/app/"
        self.verificationErrors = []
        self.accept_next_alert = True
    
    def test_tasks(self):
        driver = self.driver
        driver.get(self.base_url + "")
        driver.find_element_by_link_text("Tasks").click()
        try: self.assertRegexpMatches(driver.current_url, r"^http://localhost/app/app/[\s\S]tasks$")
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertFalse(self.is_element_present(By.CSS_SELECTOR, "table.table-list"))
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.find_element_by_css_selector("button.btn.btn-link").click()
        try: self.assertRegexpMatches(driver.current_url, r"^http://localhost/app/app/[\s\S]tasks&add$")
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.find_element_by_name("new_task_identifier").clear()
        driver.find_element_by_name("new_task_identifier").send_keys("task1")
        driver.find_element_by_name("new_task_summary").clear()
        driver.find_element_by_name("new_task_summary").send_keys("coder la bdd")
        driver.find_element_by_name("new_task_expected_duration").clear()
        driver.find_element_by_name("new_task_expected_duration").send_keys("2")
        driver.find_element_by_name("new_task_description").clear()
        driver.find_element_by_name("new_task_description").send_keys("descr")
        driver.find_element_by_css_selector("button.btn.btn-lg").click()
        try: self.assertRegexpMatches(driver.current_url, r"^http://localhost/app/app/[\s\S]tasks$")
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertTrue(self.is_element_present(By.CSS_SELECTOR, "table.table-list"))
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("task1", driver.find_element_by_css_selector("td.table-td").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.find_element_by_name("VIEW").click()
        try: self.assertEqual("task1", driver.find_element_by_id("view_task_identifier").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("coder la bdd", driver.find_element_by_id("view_task_summary").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("", driver.find_element_by_id("view_task_duration").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("2", driver.find_element_by_id("view_task_expected_duration").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("todo", driver.find_element_by_id("view_task_state").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("descr", driver.find_element_by_id("view_task_description").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.get("http://localhost/app/app/?tasks")
        driver.find_element_by_css_selector("a[name=\"EDIT\"] > img").click()
        driver.find_element_by_name("edit_task_identifier").clear()
        driver.find_element_by_name("edit_task_identifier").send_keys("task2")
        driver.find_element_by_name("edit_task_summary").clear()
        driver.find_element_by_name("edit_task_summary").send_keys("coder l'archi")
        driver.find_element_by_name("edit_task_expected_duration").clear()
        driver.find_element_by_name("edit_task_expected_duration").send_keys("1")
        driver.find_element_by_name("edit_task_description").clear()
        driver.find_element_by_name("edit_task_description").send_keys("descr2")
        driver.find_element_by_css_selector("button.btn.btn-lg").click()
        try: self.assertRegexpMatches(driver.current_url, r"^http://localhost/app/app/[\s\S]tasks$")
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.find_element_by_name("VIEW").click()
        try: self.assertEqual("task2", driver.find_element_by_id("view_task_identifier").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("coder l'archi", driver.find_element_by_id("view_task_summary").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("", driver.find_element_by_id("view_task_duration").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("1", driver.find_element_by_id("view_task_expected_duration").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("todo", driver.find_element_by_id("view_task_state").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        try: self.assertEqual("descr2", driver.find_element_by_id("view_task_description").text)
        except AssertionError as e: self.verificationErrors.append(str(e))
        driver.get("http://localhost/app/app/?tasks")
        driver.find_element_by_name("DEL").click()
    
    def is_element_present(self, how, what):
        try: self.driver.find_element(by=how, value=what)
        except NoSuchElementException, e: return False
        return True
    
    def is_alert_present(self):
        try: self.driver.switch_to_alert()
        except NoAlertPresentException, e: return False
        return True
    
    def close_alert_and_get_its_text(self):
        try:
            alert = self.driver.switch_to_alert()
            alert_text = alert.text
            if self.accept_next_alert:
                alert.accept()
            else:
                alert.dismiss()
            return alert_text
        finally: self.accept_next_alert = True
    
    def tearDown(self):
        self.driver.quit()
        self.assertEqual([], self.verificationErrors)

if __name__ == "__main__":
    unittest.main()
