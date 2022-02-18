import {toast} from "react-toastify";
import React from "react";

export function saveContact(data) {
  return fetch('http://127.0.0.1:8000/api/customer/contact', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify( data )
  })
    .then(data => data.json())
    .catch(e => {
      throw new Error(e)
    })
}