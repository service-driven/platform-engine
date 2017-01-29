require_relative 'spec_helper'

describe package('psql') do
  it { should be_installed }
end

describe service('psql') do
  it { should be_enabled }
  it { should be_running }
end

describe port(5432) do
  it { should be_listening }
end
