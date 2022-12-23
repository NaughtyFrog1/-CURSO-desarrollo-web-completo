class Alert {
  constructor(id, place) {
    /**
     * @param {string} id    The id that identifies the alert
     * @param {string} place The place where the alerts container should be
     * created. If there is another content in this place, the container will be 
     * appended at the end
     */
    this.id = id;
    this.place = place;
  }

  show(message, type = 'error', force = false) {
    /**
     * Creates a container for the different alerts in the same place and
     * append the alert with its corresponding id.
     * 
     * @param {string}  mesage The mesage to show
     * @param {string}  type   The type of alert (error or success)
     * @param {boolean} force  Create the alert, even if already exists
     */


    // Checks if alerts container already exists
    const containerExists = this.place.contains(
      this.place.querySelector(`.container-alert--${type}`)
    );
    
    // Checks if the alert already exists
    const alertExists = this.place.contains(
      this.place.querySelector(`p[data-alert=${this.id}]`)
    );

    // Create alerts container
    if (!containerExists) {
      const container = document.createElement('DIV');
      container.classList.add(`container-alert--${type}`);
      this.place.appendChild(container);
    }

    // Create alert
    if (!alertExists) {
      const p = document.createElement('P');
      p.textContent = message;
      p.classList.add(
        'alert',
        type === 'error' ? 'alert--error' : 'alert--success'
      );
      p.dataset.alert = this.id;
      this.place.querySelector(`.container-alert--${type}`).appendChild(p);
    } else if (force) {
      this.place.querySelector(
        `p[data-alert=${this.id}]`
      ).textContent = message;
    }
  }

  remove() {
    /**
     * Remove the alert
     */


    // Checks if the alert already exists
    const alertExists = this.place.contains(
      this.place.querySelector(`p[data-alert=${this.id}]`)
    );
    
    // Remove the alert
    if (alertExists) {
      this.place.querySelector(`p[data-alert=${this.id}]`).remove();
    }
  }
}
