from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class charging_discharging_session(Base):
	__tablename__ = 'charging_discharging_session'
	id = Column(Integer, primary_key=True)
	CPID = Column(Text)
	ChrgSessID = Column(Text)
	Time = Column(Text)
	EVID = Column(Text)
	PluginTime = Column(Text)
	PlugoutTime = Column(Text)
	SOCStart = Column(Text)
	SOCEnd = Column(Text)
	ChrgTime = Column(Text)
	MaxChACPower = Column(Text)
	MaxChDCPower = Column(Text)
	MaxDischACPower = Column(Text)
	MaxDischDCPower = Column(Text)
	SwID = Column(Text)
	PowerCh = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)
