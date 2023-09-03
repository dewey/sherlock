#!/bin/bash
export API_TOKEN=$(op item get iaezqmuuxnfw3d7r3fymkpgqzi --fields 'API token (Sherlock)')
export API_HOSTNAME=$(op item get iaezqmuuxnfw3d7r3fymkpgqzi --fields 'API hostname (Sherlock)')
docker-compose -f docker-compose.yml up -d